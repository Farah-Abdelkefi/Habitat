@props(['request','title','action'])
<!-- start main body part-->

                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>
                        <div class="card-body">
                            <a href="/{{$request}}" >
                                <button id="addToTable" class="btn btn-primary mb-15" type="button" >
                                    <i class="icon wb-plus" aria-hidden="true"></i> Add row
                                </button>
                            </a>
<!---->
                            <div class="row">
                                <div class="col-sm-4 col-md-6">
                                    <form method="GET" action="/{{$action}}">
                                        @csrf
                                        <div class="dataTables_length" id="addrowExample_length">
                                            <label>Show
                                                <select name="row_length" aria-controls="addrowExample" id="row_length" class="form-control input-block"  required >
                                                    <option value="10"  {{  \request(['row_length'][0]) == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="25" {{  \request(['row_length'][0]) == 25 ? 'selected' : '' }}>25</option>
                                                    <option value="50" {{ \request(['row_length'][0]) == 50 ? 'selected' : '' }} >50</option>
                                                    <option value="100" {{  \request(['row_length'][0]) == 100 ? 'selected' : '' }} >100</option>
                                                </select> <button type="submit" >entries</button>
                                            </label>

                                        </div>
                                    </form>
                                </div>


                                <div class="col-sm-4 col-md-6">
                                    <div id="addrowExample_filter" class="dataTables_filter">

                                        <form  action="/{{$action}}" method="GET">
                                            <input type="text" name="search" class="form-control" placeholder="search"  value="{{request('search')}}" aria-controls="addrowExample" >
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-vcenter table-striped" cellspacing="0" id="addrowExample">
                                    <thead>
                                    <tr>

                                        {{  $columns  }}
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        {{ $columns }}
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if( request()->is($request) )
                                        <tr role="row" class="adding odd">
                                            <form method="POST" action="/{{$request}}" enctype="multipart/form-data">
                                                @csrf

                                                {{ $addRow }}

                                            </form>
                                        </tr>
                                    @endif

                                    {{ $slot }}


                                    </tbody>
                                </table>
                                {{ $links }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
