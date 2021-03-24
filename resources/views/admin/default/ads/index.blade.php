@extends('admin.default.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            {{--  <form class="" id="sort_clients" action="" method="GET">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                        <h5 class="mb-md-0 h6">{{translate('Client Lists')}}</h5>
        </div>
        <div class="col-md-3 ml-auto">
            <select class="form-control aiz-selectpicker mb-2 mb-md-0" name="type" id="type" onchange="sort_clients()">
                <option value="">{{ translate('Sort by') }}</option>
                <option value="created_at,asc" @isset($col_name , $query) @if($col_name=='created_at' && $query=='asc' )
                    selected @endif @endisset>{{translate('Time (Old > New)')}}</option>
                <option value="created_at,desc" @isset($col_name , $query) @if($col_name=='created_at' && $query=='desc'
                    ) selected @endif @endisset>{{translate('Time (New > Old)')}}</option>
            </select>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by Name" name="search" @isset($sort_search)
                    value="{{ $sort_search }}" @endisset>
                <div class="input-group-append">
                    <button class="btn btn-light" type="submit">
                        <i class="las la-search la-rotate-270"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form> --}}
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الصفحة</th>
                    <th>العنوان</th>
                    <th>تاريخ الانتهاء</th>
                    <th> عدد الايام</th>
                    <th>الحالة</th>
                    <th>الاحداث</th>

                </tr>
            </thead>
            <tbody>
                @php
                $id =0
                @endphp
                @foreach(DB::table('ads')->orderBy('id','desc')->get() as $item_ads)
                @php
                $id ++
                @endphp
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $item_ads->page}}</td>
                    <td>{{ $item_ads->Title}}</td>
                    <td>{{ $item_ads->end}}</td>
                    <td>
                        @php
                        $date=date("d-m-Y");
                        echo dateDiff($date,$item_ads->end);
                        @endphp
                    </td>
                    <td>
                        <form action="{{ route('Advertisement.status',$item_ads->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="Submit"
                                class="btn btn-xs {{ $item_ads->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                @if($item_ads->status ==1)
                                الاعلان مفعل
                                @else
                                الاعلان غير مفعل
                                @endif
                            </button>
                        </form>

                    </td>
                    <td>
                        <a href="{{ route('Advertisement.edit', ['id'=>$item_ads->id]) }}" class="btn btn-info btn-block" role="button">تعديل</a>
                        <a href="{{ route('Advertisement.dell', ['id'=>$item_ads->id]) }}" class="btn btn-warning btn-block" role="button">حذف</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  
    </div>
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function sort_clients(el){
        $('#sort_clients').submit();
    }
</script>
@endsection