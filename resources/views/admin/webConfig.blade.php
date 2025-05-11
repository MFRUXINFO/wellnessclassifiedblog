@component('admin.component.content')
    @slot('title') Web Config @endslot

    @slot('navigation')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    @endslot

    @slot('addicon')
    @endslot

    @slot('content')
    <div class="row">
        <div class="col-lg-2 col-md-6 col-12">
            <div class="card border border-primary p-2">
                <h6><b>Body Color</b></h6>
                <div class="row">
                    <div class='form-group col-3'>
                        <input type='color' name='bodyColor' value="{{$data['bodyColor']}}" class='form-control form-control-color'>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" onclick="SubmitData('bodyColor')"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 col-12">
            <div class="card border border-primary p-2">
                <h6><b>Theme Color</b></h6>
                <div class="row">
                    <div class='form-group col-3'>
                        <input type='color' name='themeColor' value="{{$data['themeColor']}}" class='form-control form-control-color'>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" onclick="SubmitData('themeColor')"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 col-12">
            <div class="card border border-primary p-2">
                <h6><b>Background Color</b></h6>
                <div class="row">
                    <div class='form-group col-3'>
                        <input type='color' name='backgroundColor' value="{{$data['backgroundColor']}}" class='form-control form-control-color'>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" onclick="SubmitData('backgroundColor')"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 col-12">
            <div class="card border border-primary p-2">
                <h6><b>Font Color</b></h6>
                <div class="row">
                    <div class='form-group col-3'>
                        <input type='color' name='fontColor' value="{{$data['fontColor']}}" class='form-control form-control-color'>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" onclick="SubmitData('fontColor')"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card border border-primary p-2">
                <h6><b>Logo</b></h6>
                <div class="row">
                    <div class='form-group col-8'>
                        <input type='file' name='logo' class='form-control' accept="image/*">
                    </div>
                    <div class='form-group col-3'>
                        <img src="{{$data['logo']}}" class="w-100">
                    </div>
                    <div class='form-group col-1'>
                        <button class="btn btn-sm btn-primary" onclick="SubmitData('logo')"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card border border-primary p-2">
                <h6><b>Favicon Logo</b></h6>
                <div class="row">
                    <div class='form-group col-8'>
                        <input type='file' name='faviconLogo' class='form-control' accept="image/*">
                    </div>
                    <div class='form-group col-3'>
                        <img src="{{$data['faviconLogo']}}" class="w-100">
                    </div>
                    <div class='form-group col-1'>
                        <button class="btn btn-sm btn-primary" onclick="SubmitData('faviconLogo')"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endslot

    @slot('js')
        <script>
            $('.webConfig').addClass('active')


            function SubmitData(params) {
                $('.errmsg').text('');

                var data = '';

                if(params == 'bodyColor' || params == 'themeColor' || params == 'backgroundColor' || params == 'fontColor'){
                    var data = $("input[name='"+params+"']").val();
                }

                if (params == 'logo' || params == 'faviconLogo')
                {
                    var data = $("input[name='" + params + "']")[0].files[0];
                }

                var url = '{{ route('admin.webConfig') }}';
                var formData = new FormData();
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("type", params);
                formData.append("data", data);

                $.ajax({
                    type: 'POST',
                    url: url,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    data: formData,
                    beforeSend: function() {
                        $('#loader').removeClass('d-none');
                    },
                    complete: function(data, status) {
                        $('#loader').addClass('d-none');
                    },
                    success: function(data) {
                        if (data.status == 401) {
                            $.each(data.error1, function(index, value) {
                                $('.errmsg_' + index).text(value);
                            });
                        }
                        if (data.status == 1) {
                            window.location.reload();
                        }
                    },
                });
            }
        </script>
    @endslot
@endcomponent
