window.addEventListener('load',function(){
    const btnDelete = document.querySelectorAll('.handle_delete');
    console.log(btnDelete);
    const deleteData = function (e){
        e.preventDefault();
        if(e.target.matches('.handle_delete i')){
            let url = e.target.parentElement.getAttribute('href');
            let that = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        contentType: "application/json",
                        url: url,
                        dataType: 'text',
                        success: function (data) {
                            console.log(data)
                            if (+data > 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "There are "+(data)+" users in the group. Can't delete user group!",
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })
                            }
                            else {
                                if (+data == -1) {
                                    that.parentElement.parentElement.remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your group has been deleted.',
                                        'success'
                                    )
                                }
                                else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: "System error!",
                                        footer: '<a href="">Why do I have this issue?</a>'
                                    })
                                }
                            }
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                }
            })
        }
    }


    btnDelete.forEach(item=> {
        item.addEventListener('click',deleteData);
    });
})