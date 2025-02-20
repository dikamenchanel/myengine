  const dfreeBodyConfig = {
    selector: '#tinymce',
    // language: 'ru_RU',
    menubar: false,
    width:'100%',
    // inline: true,
    plugins: [
      'autolink', 'codesample', 'link', 'lists','table', 'image',
      'quickbars', 'help','charmap', 'code','emoticons', 'fullscreen', 'preview'
    ],
    automatic_uploads: true,
    images_file_types: 'jpg,jpeg,png,webp',
    file_picker_types: 'image',
    file_picker_callback: uploadImage,
    // toolbar: false,
    toolbar:  'bold italic underline | blocks | alignleft aligncenter alignright | bullist numlist | outdent indent | image link code charmap emoticons fullscreen preview',
    quickbars_insert_toolbar: 'blocks | alignleft aligncenter alignright | bullist numlist | outdent indent' ,
    // quickbars_selection_toolbar: 'image  link code', 
    contextmenu: 'copy paste | undo redo | image  link | alignleft aligncenter alignright | bullist numlist | outdent indent | cell row column deletetable | help',
  };

  tinymce.init(dfreeBodyConfig);

  function uploadImage(cb, value, meta)
  {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];
      
      const reader = new FileReader();

      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
          var formData = new FormData();
          formData.append("image", file);
          formData.append("csrf", document.querySelector('input[name="csrf"]').value);

          fetch("/admin/saveimage", {
            method: "POST",
            body: formData,
          })
          .then(res => res.json())
          .then(data => {
            if(data)
            {
              const id = 'blobid' + (new Date()).getTime();
              const blobCache =  tinymce.activeEditor.editorUpload.blobCache;

              const base64 = reader.result.split(',')[1];
              const blobInfo = blobCache.create(id, file, base64);
              blobCache.add(blobInfo);
              /* call the callback and populate the Title field with the file name */
              cb(data, { title: file.name });
            }
          })
          .catch(function (error) {
            console.error("Сетевая ошибка: " + error);
          });
      });
      reader.readAsDataURL(file);
    });

    input.click();
  }
