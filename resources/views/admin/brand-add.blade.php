@extends('layouts.admin')

@section('content')


             <div class="main-content flex justify-center px-4" >
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Información de marca</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('admin.index')}}">
                                                <div class="text-tiny">Panel</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.brand')}}">
                                                <div class="text-tiny">Marcas</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Nuevas Marcas</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <fieldset class="name">
                                            <div class="body-title">Nombre de marca <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Nombre de marca" name="name"  tabindex="0" value="{{old('name')}}" aria-required="true" required="">
                                        </fieldset>
                                          @error('name') <span class="alert alert-danger text-center">{{$message}}</span> @enderror

                                        <fieldset class="name">
                                            <div class="body-title">Identificador de Marca <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Identificador de Marca" name="slug" tabindex="0" value="{{old('slug')}}" aria-required="true" required="">
                                        </fieldset>

                                        @error('slug') <span class="alert alert-danger text-center">{{$message}}</span> @enderror

                                        <fieldset>
                                            <div class="body-title">Subir imagenes<span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                                <div class="item" id="imgpreview" style="display:none">
                                                    <img src="upload-1.html" class="effect8" alt="">
                                                </div>
                                                <div id="upload-file" class="item up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="body-text">Suelta tu imagen aqui <span
                                                                class="tf-color">click para buscar</span></span>
                                                        <input type="file" id="myFile" name="image" accept="image/*">
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                              @error('image') <span class="alert alert-danger text-center">{{$message}}</span> @enderror

                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                
                    </div>



@endsection


@push('scripts')
<script>
$(function () {
    // Vista previa de imagen
    $("#myFile").on("change", function(e) {
        const photoInp = $("#myFile");
        const [file] = this.files;
        if (file) {
            $("#imgpreview img").attr('src', URL.createObjectURL(file)).show();
            $("#imgpreview").show();
        }
    });

    // Generar slug automáticamente al escribir el nombre
    $("input[name='name']").on("change", function () {
        $("input[name='slug']").val(StringToSlug($(this).val()));
    });
});


function StringToSlug(text) {
    return text.toLowerCase()
        .replace(/[^\w ]+/g, "")  
        .replace(/ +/g, "-");   
}
</script>
@endpush


