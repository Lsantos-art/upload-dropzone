@extends('layouts.bootstrap')
@section('title', 'Produtos')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css">
<meta name="csrf-token" content="{{ csrf_token() }}">


@section('content')
<div class="container">
    <h2 class="text-center p-4 bg-dark text-white">Attach <span>Documents </span></h2>

    <form action="{{ route('teststore') }}" class="dropzone" id="dropzonewidget" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="2">
        <input hidden name="documents" id="documents" type="text" />
    </form>
</div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
    <script>

        var segments = location.href.split('/');
        var action = segments[3];
        if (action == 'dropzone') {
            var acceptedFileTypes = "image/*, .psd"; //dropzone requires this param be a comma separated list
            var fileList = new Array;
            var i = 0;
            var callForDzReset = false;
            $("#dropzonewidget").dropzone({

                url: "{{ route('teststore') }}",
                dictDefaultMessage: "Solte aqui as imagens do produto(Max.5)",
                addRemoveLinks: true,
                removedfile: function(file) {
                var name = file.serverFn.normalize('NFD').replace(/([""])/g, '');;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('testdelete') }}",
                    data: {name: name, request: 2},
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });

                var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },

                maxFiles: 5,
                acceptedFiles: 'image/*',
                maxFilesize: 5,
                init: function () {
                    this.on("success", function (file, serverFileName) {
                        file.serverFn = serverFileName;
                        fileList[i] = {
                            "serverFileName": serverFileName,
                            "fileName": file.name,
                            "fileId": i
                        };
                        i++;
                        console.log(file.serverFn)
                    });
                }
            });
        }
    </script>
@endsection

