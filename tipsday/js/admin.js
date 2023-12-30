if(document.getElementById("form_action"))
{  
  const fileInput = document.getElementById('avatar');
  const imagePreview = document.getElementById('image-preview');
  
  fileInput.addEventListener('change', () => {
      if (fileInput.files && fileInput.files[0]) 
      {
          const reader = new FileReader();
          reader.onload = (e) => {imagePreview.src = e.target.result;};
          reader.readAsDataURL(fileInput.files[0]);
      }
  });
  
  const isPublish = document.getElementById('is_published');
  const isPostponed = document.getElementById('is_postponed');
  
  isPublish.onchange = () => { if(isPostponed.checked){isPostponed.checked = false;isPostponed.parentElement.removeChild(isPostponed.parentElement.lastChild)};}
  isPostponed.onchange = isPostponedChange;

  if(document.getElementById('is_postponed') && document.getElementById('is_postponed').checked)
  {
        if (sessionStorage.getItem("form")){sessionStorage.removeItem("form");}
        isPostponedChange();
        document.getElementById('postponed_date').value = dataPostponed[0].split('.').reverse().join('-');
        document.getElementById('postponed_time').value = dataPostponed[1];
  }
  function isPostponedChange (){ 
      if(isPublish.checked)
      {isPublish.checked = false};

      if(document.getElementById('is_postponed').checked)
      {
          const inputDate = document.createElement('input');
          inputDate.type  = 'date';
          inputDate.id    = 'postponed_date';
          inputDate.name  = 'postponed_date';
  
          const inputTime = document.createElement('select');
          inputTime.id    = 'postponed_time';
          inputTime.name  = 'postponed_time';
          let option = document.createElement('option'); 
          option.value = '';
          option.innerHTML = '--:--';
          inputTime.append(option);
          
          let startTime = new Date(0);
          startTime.setHours(0, 0, 0, 0);
  
          let endTime = new Date(0);
          endTime.setHours(23, 45, 0, 0);
  
          let interval = 15 * 60 * 1000;
  
          for (let currentTime = startTime; currentTime <= endTime; currentTime.setTime(currentTime.getTime() + interval)) 
          {
              let hours   = currentTime.getHours();
              let minutes = currentTime.getMinutes();
  
              let timeString = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;
              let option = document.createElement('option');
              option.value = timeString; 
              option.innerHTML = timeString;
              inputTime.append(option); 
          }
  
          const spanWrapper = document.createElement('span');
          spanWrapper.style.display   = 'flex';
          spanWrapper.style.margin    = '20px';
          spanWrapper.append(inputDate);
          spanWrapper.append(inputTime);
          isPostponed.parentElement.append(spanWrapper);
          flag = false
      }else{
          isPostponed.parentElement.removeChild(isPostponed.parentElement.lastChild);
          flag = true
      }
  }

document.getElementById("form_action").addEventListener("submit", function(e) {
    const Form = new FormData(document.getElementById("form_action"));
    e.preventDefault();
    let form = {};
    console.log(document.getElementById('is_published').checked);
    Form.forEach((value,key) => form[key] = value);
    form['is_magnet'] = document.getElementById('is_magnet').checked
    form['is_published'] = document.getElementById('is_published').checked
    form['is_postponed'] = document.getElementById('is_postponed').checked
    sessionStorage.setItem("form", JSON.stringify(form));
    document.getElementById("form_action").submit();
})

if (sessionStorage.getItem("form")) {
    let savedData = JSON.parse(sessionStorage.getItem("form"));
    for(let key in savedData)
    {
        if(document.getElementById(key))
        {
            if(document.getElementById(key).type != 'file')
            {
                document.getElementById(key).value = savedData[key];
            }

            if(document.getElementById(key).type == 'checkbox')
            {
                if(key == 'is_postponed' && savedData[key])
                {
                    document.getElementById('is_postponed').checked = savedData[key];
                    isPostponedChange();
                }
                document.getElementById(key).checked = savedData[key];
            }
        }
    }
}

}else{
    if (sessionStorage.getItem("form")){sessionStorage.removeItem("form");}
}

if(document.getElementById('pagination'))
{
    document.getElementById('pagination').addEventListener('click' , (e) => {
        console.log(e.currentTarget)
    })
}
if(document.querySelector('.access'))
{
    setTimeout(()=>{
        document.querySelector('.access').style.marginTop  = '-90px';
    }, 3000)
    setTimeout(()=>{
        document.querySelector('.access').style.display   = 'none';
    }, 3800)

}
if(document.querySelector('.error-status'))
{
    setTimeout(()=>{
        document.querySelector('.error-status').style.marginTop  = '-90px';
    }, 3000)
    setTimeout(()=>{
        document.querySelector('.error-status').style.display   = 'none';
    }, 3800)

}
