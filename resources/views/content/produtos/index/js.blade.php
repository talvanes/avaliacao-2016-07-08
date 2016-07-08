@section('javascript')
<script src="//code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    (function ($) {
        $('#tblProdutos').DataTable({
            ajax: {
                url: "{!! route('produto.index') !!}",
                data: function() {},
            },
            serverSide: true,
            processing: true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'productPicture', name: 'productPicture'},
                {data: 'productName', name: 'productName'},
                {data: 'productPrice', name: 'productPrice'},
                {data: 'productDesciption', name: 'productDesciption'},
                {data: 'categoryId', name: 'categoryId'},
                {
                    data: function (row) {
                        return "<a href=" + '{!! route('produto.edit') !!}'.split('*')[0] + row.id +"'>"+ "{!! trans('produto.index.linkEdit') !!}" +"</a>" +
                                "<a href=" + '{!! route('produto.destroy') !!}'.split('*')[0] + row.id +"'>"+ "{!! trans('produto.index.linkDestroy') !!}" +"</a>"
                    },
                    name: '_actions'
                },
            ]
        });
    })(jQuery);
</script>
@endsection