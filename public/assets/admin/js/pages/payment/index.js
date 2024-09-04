$(function () {
    // crud table
    if ($('#records').length) records.init();
});
records = {
    init: function () {
        $('#records').jtable({
            title: 'Manage Payments',
            paging: true //Enable paging
                ,
            pageSize: 10 //Set page size (default: 10)
                ,
            sorting: false,
            addRecordButton: $('#recordAdd'),
            deleteConfirmation: function (data) {
                data.deleteConfirmMessage = 'Are you sure to delete payment ' + data.record.title + '?';
            },
            formCreated: function (event, data) {
                reInitDesign(event, data);
            },
            actions: {
                listAction: _listing,
                deleteAction: _delete
            },
            fields: {
                id: {
                    key: true,
                    create: false,
                    edit: false,
                    list: false
                },
				transaction_type: {
                    title: 'Payment Type',
                    list: true,
                    type: 'text'
                },
                name: {
                    title: 'Name',
                    list: true,
                    type: 'text',
                    display: function(data) {
                        return data.record.title+' '+data.record.name;
                    }
                },
                course: {
                    title: 'Course',
                    list: true
                },
                email: {
                    title: 'Name',
                    list: true,
                    type: 'text'
                },
                phone: {
                    title: 'Phone',
                    list: true,
                    type: 'text'
                },
                mobile: {
                    title: 'Mobile',
                    list: true,
                    type: 'text'
                },
                address: {
                    title: 'Address',
                    list: true,
                    type: 'text'
                },
                price: {
                    title: 'Price',
                    list: (_status == "payment" ? true : false),
                    type: 'text'
                }
				
            }
        }).jtable('load', {status: _status});

        $('#search').click(function (e) {
            e.preventDefault();
            $('#records').jtable('load', {
                name: $('[name=name]').val()
            });
        });
    }
};