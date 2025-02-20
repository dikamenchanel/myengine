if(document.querySelector('.main-banner'))
{
    const slides    = document.querySelectorAll('.main-banner>a');
    const previews  = document.querySelectorAll('.preview>img');
    let currentIndex = 0;

    function moveToSlide()
    {
        slides[currentIndex].classList.remove('active');
        previews[currentIndex].classList.remove('active-preview');
        if(currentIndex == 0)
        {
            slides[slides.length-1].classList.remove('prev')
        }else{
            slides[currentIndex-1].classList.remove('prev')
        }
        slides[currentIndex].classList.add('prev');
        
        currentIndex = (currentIndex+1) % slides.length;
       
        slides[currentIndex].classList.add("active");
        previews[currentIndex].classList.add("active-preview");
    }   
    setInterval(moveToSlide, 20000);

    previews.forEach(item => {
        item.addEventListener('click', (e) => {
            let index = Array.from(previews).indexOf(e.target)
            currentIndex = index;
            slides.forEach(i => {i.classList.remove('active');i.classList.remove('prev')});
            previews.forEach(i => i.classList.remove('active-preview'))
            
            if(index == 0)
            {
                slides[slides.length-1].classList.add('prev')
            }else{
                slides[index-1].classList.add('prev');
            }
            
            slides[index].classList.add('active');
            previews[index].classList.add('active-preview');


        })
    })

}
