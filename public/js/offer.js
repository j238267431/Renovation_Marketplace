function offerDelete()
{
    event.preventDefault();
    var id = event.toElement.dataset.id
    $.ajax({

        url: "http://localhost:8888/account/companies/offer/destroy?id="+id,
        method: "DELETE",
// data: {id:id},

        headers: {

            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
            'Content-type': 'application/json; charset=utf-8',
        },

        success: function (data) {

            document.location.href = "http://localhost:8888/account/companies/offer/index"

        },

        error: function (msg) {

            console.log(msg)

        }

    });

}
