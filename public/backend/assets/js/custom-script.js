document.querySelector('#profile_pic').addEventListener('change', (e) => {
    if(e.target.files.length > 0) {
        const reader = new FileReader();
        reader.addEventListener('load', (x) => {
            document.querySelector('#pic_preview').setAttribute('src', x.target.result);
        });
        reader.readAsDataURL(e.target.files[0]);
    }
});