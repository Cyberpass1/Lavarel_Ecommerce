@extends('layouts.admin')

@section('content')


             <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Información de categoria</h3>
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
                                            <a href="{{route('admin.brand.add')}}">
                                                <div class="text-tiny">Categorias</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Editar Categoria</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        @method('PUT')

                                           <input type="hidden"  name="id" value={{$category->id}}/> 


                                        <fieldset class="name">
                                            <div class="body-title">Nombre de categoria <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Nombre de la categoria" name="name"  tabindex="0" value="{{$category->name}}" aria-required="true" required="">
                                        </fieldset>
                                          @error('name') <span class="alert alert-danger text-center">{{$message}}</span> @enderror

                                        <fieldset class="name">
                                            <div class="body-title">Identificador de categoria <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Identificador de Categoria" name="slug" tabindex="0" value="{{$category->slug}}" aria-required="true" required="">
                                        </fieldset>

                                        @error('slug') <span class="alert alert-danger text-center">{{$message}}</span> @enderror

                                        <fieldset>
                                            <div class="body-title">Subir imagenes<span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                                @if($category->image)

                                                <div class="item" id="imgpreview" >
                                                    <img src="{{asset('uploads/categories')}}/{{$category->image}}" class="effect8" alt="">
                                                </div>
                                                  @endif


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
                                            <button class="tf-button w208" type="submit">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 Cyberia</div>
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


