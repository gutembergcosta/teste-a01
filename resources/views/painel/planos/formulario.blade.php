@extends('layouts.painel')

@section('pagina')

    <div id="wrapper">
        @include('painel.blocos.topo')
        @include('painel.blocos.sidebar')
        
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                                    
                    <div class="row">
                        <form id="formulario" class="formulario" action="{{ url($actionForm) }}" method="post">  

                            @csrf
                            
                            @isset($item['id']) <input type="hidden" name="id" value="{{ $item['id'] }}"> @endisset
                            <input type="hidden" name="ref" value="{{ $ref }}">
                            <input type="hidden" name="action" value="{{ $action }}">


                            <div class="col-md-9 area">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Formulário</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div id="msgz"></div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label>Nome:</label>
                                                <input type="text" class="form-control" name="nome" value="{{ $item['nome']  ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Texto:</label>
                                                <textarea id="texto" class="form-control editorx" placeholder="textarea" rows="12"  >{{ $item['texto']  ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                @component('painel.blocos.upload-galeria', $dataGaleria)
                                @endcomponent
                                
              
                            </div>


                            <div class="col-md-3 side-area">
                                @component('painel.blocos.upload-destaque', $dataImgDestaque)
                                    <p>Dimensôes recomendadas: <br>900x450px</p>
                                @endcomponent
                            </div>

                        </form>

                        <script>


                            $(document).ready(function () {

                                $("#formulario").submit(function (e) {
                                    e.preventDefault();

                                    var data = $(this).serializeArray();
                                    data.push({ name: "texto", value: tinymce.get('texto').getContent() });

                                    enviaForm(data, $(this).attr('action'));

                                });

                                
                            });

                        </script>

                  
                    </div>

                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        @include('painel.blocos.footer')
    </div>
@endsection

