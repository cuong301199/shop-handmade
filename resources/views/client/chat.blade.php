@extends('client.template.master')
@section('content')
<!DOCTYPE html>
<html>
<body>
<div class="container">
    <div class="panel panel-success">
        <div class="panel-body">
            <form action="" method="post">
                @csrf
                <legend>Upload</legend>

                <div class="form-group">
                    <label for="file">Chọn file</label>
                    <input id="file" type="file" name="sortpic" required=""/>
                </div>
                <div class="form-group">
                    <button id="upload" class="btn btn-primary">Upload</button>
                </div>
            </form>
            <div class="status alert alert-success"></div>
        </div>
    </div>
    <div class="file-image">

    </div>
</div>
</body>
</html>
@endsection
@push('Add-Cart')
<script>
    $(document).ready(function () {
        $('#upload').click(function (e) {
            e.preventDefault();
            var form_data = new FormData();
            // attachment_data= $("#file").find("input")[0].files[0];
            var attachment_data = $('#file').prop('files')[0];
            form_data.append("file", attachment_data);
            console.log(attachment_data)
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

            $.ajax({
                type: "post",
                data: form_data,
                url: "/accep-file",
                contentType: false,
                processData: false,
                success: function (data) {

                },
            });
        });
    });
</script>
@endpush


