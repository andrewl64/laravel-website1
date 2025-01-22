document.querySelector('#image').addEventListener('change', (e) => {
    if(e.target.files.length > 0) {
        const reader = new FileReader();
        reader.addEventListener('load', (x) => {
            document.querySelector('#pic_preview').setAttribute('src', x.target.result);
        });
        reader.readAsDataURL(e.target.files[0]);
    }
});

document.querySelector('#multi_img').addEventListener('change', (e) => {
    if(e.target.files.length > 0) {
        const reader = new FileReader();
        reader.addEventListener('load', (x) => {
            document.querySelector('#multi_img_preview').setAttribute('src', x.target.result);
        });
        reader.readAsDataURL(e.target.files[0]);
    }
});

document.querySelectorAll('.delete_img').forEach(btn=> {
    btn.addEventListener('click', (e)=> {
        e.preventDefault();
        const x = e.target.href;

        Swal.fire({
            title: 'Are you sure you want to delete this image?',
            text:"This action can't be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, I am sure I want to delete the image',
        }).then((res)=>{
            if(res.isConfirmed) {
                window.location.href = x;
                Swal.fire({
                    title: 'Confirmation received successfully.',
                    text: 'Selected image will be removed now.',
                    icon: 'success',
                });
            }
        });

    });
});