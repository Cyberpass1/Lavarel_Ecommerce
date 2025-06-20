@extends('layouts.admin')
@section('content')
 
   <div class="main-content flex justify-center px-4">
    

                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Categorias</h3>
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
                                            <div class="text-tiny">Categorias</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{route('admin.category.add')}}"><i
                                                class="icon-plus"></i>Agregar Nuevo</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <div class="table-responsive">

                                           @if (Session::has('status'))
                                           <p class="alert alert-sucess">{{Session::get('status')}}</p>
                                         
                                           @endif
 
                                       <div class=".table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre</th>
                                                        <th>Slug</th>
                                                        <th>Productos</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($categories as $category )
                                              

                                                    <tr>
                                                        <td>{{$category->id}}</td>
                                                        <td class="pname">
                                                            <div class="image">
                                                                <img src="{{asset('uploads/categories')}}/{{$category->image}}" alt="{{$category->name}}" class="image">
                                                            </div>
                                                            <div class="name">
                                                                <a href="#" class="body-title-2">{{$category->name}}</a>
                                                            </div>
                                                        </td>
                                                        <td>{{$category->slug}}</td>
                                                        <td><a href="#" target="_blank">0</a></td>
                                                        <td>
                                                            <div class="list-icon-function">
                                                                <a href="{{route('admin.category.edit', ['id'=>$category->id])}}">
                                                                    <div class="item edit">
                                                                        <i class="icon-edit-3"></i>
                                                                    </div>
                                                                </a>
                                                                <form action="" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                             
                                                                   <div class="item text-danger delete">
                                                                        <i class="icon-trash-2"></i>
                                                                    </div>


                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                          
                                                    @endforeach
                                                </tbody>
                                            </table>
                                       </div>


                                            
                                        </div>
                                        <div class="divider"></div>
                                        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                         
                                            {{ $categories->links('pagination::bootstrap-5') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    
    </div>

@endsection

@push('scripts')
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function () {
        $('.delete').on('click', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡Esta acción no se puede deshacer!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'No, cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>


@endpush