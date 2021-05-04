function offerDelete()
{
    event.preventDefault();
    var id = event.toElement.dataset.id
    $.ajax({

        url: "/account/companies/offer/destroy?id="+id,
        method: "DELETE",
// data: {id:id},

        headers: {

            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
            'Content-type': 'application/json; charset=utf-8',
        },

        success: function (data) {

            document.location.href = "/account/companies/offer/index"

        },

        error: function (msg) {

            console.log(msg)

        }

    });

}
