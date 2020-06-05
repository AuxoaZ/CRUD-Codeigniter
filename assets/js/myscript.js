
// notiflix notif
const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {

    Notiflix.Notify.Init({
        position: "right-bottom",
        fontSize: "17px",
        cssAnimationStyle: "from-bottom",
        cssAnimationDuration: 500,
        success: {
            background: "#00796b",
        },
    });
    Notiflix.Notify.Success('Data successfully ' + flashdata);
}

const flashdata2 = $('.flash-data-fail').data('flashdata-fail');

if (flashdata2) {

    Notiflix.Notify.Init({
        position: "right-bottom",
        fontSize: "17px",
        cssAnimationStyle: "from-bottom",
        cssAnimationDuration: 500,
        failure: {
            background: "#d32f2f",
        },
    });
    Notiflix.Notify.Failure(flashdata2);
}

//tombol delete
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Notiflix.Confirm.Init({
        position: "center-top",
        backgroundColor: "#d5eeec",
        titleColor: "#0f1110",
        okButtonBackground: "#00796b",
        cancelButtonBackground: "#c87474",
    });

    Notiflix.Confirm.Show
        ('Confirm',
            'Are you sure?',
            'Yes',
            'No',
            function () {
                document.location.href = href;
            },

            function () {
                Notiflix.Notify.Init({
                    position: "right-bottom",
                    fontSize: "17px",
                    cssAnimationStyle: "from-bottom",
                    cssAnimationDuration: 500,
                    failure: {
                        background: "#d32f2f",
                    },
                });
                Notiflix.Notify.Failure('Canceled');
            });
});
