@extends('layouts.admin')
@section('content')

   <div class="main-content flex justify-center px-4">

                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Editar Producto</h3>
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
                                            <a href="{{route('admin.products')}}">
                                                <div class="text-tiny">Productos</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Editar Producto</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- form-add-product -->
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.product.update')}}">
                                @csrf

                                @method('PUT')

                                <input type="hidden" name="id" value="{{$product->id}}">
                                   
                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Nombre del Producto <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Ingresa el nombre del producto" name="name" tabindex="0" value="{{$product->name}}" aria-required="true" required="">
                                            <div class="text-tiny">No excedas los 100 caracteres al agregar el nombre</div>
                                        </fieldset>
                                           @error('name') <span class="alert alert-danger text-center">{{$message}}</span>
@enderror


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug" name="slug" tabindex="0" value="{{$product->slug}}" aria-required="true" required="">
                                            <div class="text-tiny">No excedas los 100 caracteres al agregar el slug</div>
                                        </fieldset>
                                           @error('slug') <span class="alert alert-danger text-center">{{$message}}</span>
@enderror

                                        <div class="gap22 cols">
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Categorias <span class="tf-color-1">*</span> </div>

                                                <div class="select">
                                                    <select class="" name="category_id">
                                                        <option>Seleccionar Categoria</option>

                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{$product->category_id== $category->id ? "Selected":""}}>{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </fieldset>
                                    @error('category_id') <span class="alert alert-danger text-center">{{$message}}</span>
@enderror
                                            <fieldset class="brand">
                                                <div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="brand_id">
                                                        <option>Seleccionar Marca</option>

                                                        @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}" {{$product->brand_id== $brand->id ? "Selected":""}}>{{$brand->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </fieldset>
                                             @error('brand_id') <span class="alert alert-danger text-center">{{$message}}</span>
                                             @enderror

                                        </div>

                                        <fieldset class="shortdescription">
                                            <div class="body-title mb-10">Breve descripción <span
                                                    class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="short_description" placeholder="Breve descripción" tabindex="0" aria-required="true" required="">{{$product->short_description}}</textarea>

                                            <div class="text-tiny">No excedas los 100 caracteres al agregar la breve descripción</div>
                                        </fieldset>
                                           @error('short_description') <span class="alert alert-danger text-center">{{$message}}</span>
                                           @enderror

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Descripción <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Descripción" tabindex="0" aria-required="true" required="">{{$product->description}}</textarea>
                                            <div class="text-tiny">No excedas los 150 caracteres al agregar la descripción</div>
                                        </fieldset>
                                           @error('description') <span class="alert alert-danger text-center">{{$message}}</span>
                                           @enderror
                                    </div>
                                    <div class="wg-box">
                                        <fieldset>
                                            <div class="body-title">Subir Imagenes <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                                @if($product->image)
                                                
                                                <div class="item" id="imgpreview" >
                                                    <img src="{{asset('uploads/products')}}/{{$product->image}}" class="effect8" alt="{{$product->name}}">
                                                </div>
                                                @endif


                                                <div id="upload-file" class="item up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="body-text">Suelta tus imagenes aqui<span
                                                                class="tf-color">click para buscar</span></span>
                                                        <input type="file" id="myFile" name="image" accept="image/*">
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                           @error('images') <span class="alert alert-danger text-center">{{$message}}</span>
                                           @enderror

                                        <fieldset>
                                            <div class="body-title mb-10">Subir galeria de imagenes</div>
                                            <div class="upload-image mb-16">
                                                @if($product->images)

                                                @foreach(explode(',',$product->images) as $img)
                                               
                                                <div class="item gitems">
                                                <img src="{{asset('uploads/products')}}/{{trim($img)}}" alt="">
                                                </div>    
                                                @endforeach                    
                                                
                                                @endif


                                                <div id="galUpload" class="item up-load">
                                                    <label class="uploadfile" for="gFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="text-tiny">Suelta tus imagenes aqui o selecciona <span class="tf-color"> click para buscar</span></span>
                                                        <input type="file" id="gFile" name="images[]" accept="image/*" multiple="">
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                         @foreach ($errors->get('images.*') as $messageArray)
                                         @foreach ($messageArray as $message)
                                        <span class="alert alert-danger text-center">{{ $message }}</span>
                                         @endforeach
                                         @endforeach

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Precio regular <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter regular price" name="regular_price" tabindex="0" value="{{$product->regular_price}}" aria-required="true" required="">
                                            </fieldset>
                                          @error('regular_price') <span class="alert alert-danger text-center">{{$message}}</span>
                                          @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Precio de oferta <span class="tf-color-1">*</span></div>

                                                <input class="mb-10" type="text" placeholder="Enter sale price" name="sale_price" tabindex="0" value="{{$product->sale_price}}" aria-required="true">
                                            </fieldset>
                                               @error('sale_price') <span class="alert alert-danger text-center">{{$message}}</span>
                                               @enderror
                                        </div>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span> </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU" tabindex="0" value="{{$product->SKU}}" aria-required="true" required="">
                                            </fieldset>
                                               @error('SKU') <span class="alert alert-danger text-center">{{$message}}</span>
                                               @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Cantidad <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity"  name="quantity" tabindex="0" value="{{$product->quantity}}" aria-required="true" required="">
                                            </fieldset>
                                               @error('quantity') <span class="alert alert-danger text-center">{{$message}}</span>
                                               @enderror
                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock</div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                        <option value="Instock" {{$product->stock_status== "Instock" ? "Selected":""}}>En stock</option>
                                                        <option value="outstock" {{$product->stock_status== "outstock" ? "Selected":""}}>Fuera de stock</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                               @error('stock_status') <span class="alert alert-danger text-center">{{$message}}</span>
                                               @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Presentación</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                        <option value="0" {{$product->featured== "0" ? "Selected":""}}>No</option>
                                                        <option value="1" {{$product->featured== "1" ? "Selected":""}}>Si</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                               @error('images') <span class="alert alert-danger text-center">{{$message}}</span>
                                               @enderror
                                        </div>
                                        <div class="cols gap10">
                                            <button class="tf-button w-full" type="submit">Editar Producto</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /form-add-product -->
                            </div>
                            <!-- /main-content-wrap -->
                        </div>
                        <!-- /main-content-wrap -->

                      
                    </div>

@endsection

@push('scripts')
<script>
$(function () {
    // Vista previa de imagen principal
    $("#myFile").on("change", function(e) {
        const [file] = this.files;
        if (file) {
            $("#imgpreview img").attr('src', URL.createObjectURL(file)).show();
            $("#imgpreview").show();
        }
    });

    // Vista previa de imágenes de galería
    $("#gFile").on("change", function(e) {
        const gphotos = this.files;
      //  $("#galUpload").empty();  Opcional: limpia antes de mostrar nuevas

        $.each(gphotos, function(key, val) {
            const imageUrl = URL.createObjectURL(val);
            const html = `<div class="item gitems"><img src="${imageUrl}" style="max-width:100px; margin:5px;"></div>`;
            $("#galUpload").prepend(html);
        });
    });

    // Generar slug automáticamente al escribir el nombre
    $("input[name='name']").on("change", function () {
        $("input[name='slug']").val(StringToSlug($(this).val()));
    });
});

// Función para convertir texto a slug
function StringToSlug(text) {
    return text.toLowerCase()
        .replace(/[^\w ]+/g, "")  // Elimina caracteres especiales
        .replace(/ +/g, "-");     // Reemplaza espacios por guiones
}
</script>
@endpush
