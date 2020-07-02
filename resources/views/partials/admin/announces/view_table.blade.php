{{--<span style="margin-top: 10px;margin-left: 20px;color: black;font-weight: 500">{{$all_announces_count}} elan</span>--}}
<table class="table table-striped table-bordered projects">
    <thead>
        <tr id="announce_admin_tr">
            <th>#<br><input type="text" class="admin_announces_inputs" id="admin_announces_id_search"></th>
            <th style="padding-bottom: 44px">Tarix</th>
            <th>Email<br><input type="text" class="admin_announces_inputs" id="admin_announces_email_search"></th>
            <th>Ad<br><input type="text" class="admin_announces_inputs" id="admin_announces_name_search"></th>
            <th>Telefon<br><input type="text" class="admin_announces_inputs" id="admin_announces_phone_search"></th>
            <th style="padding-bottom: 44px">Status</th>
            <th style="padding-bottom: 44px">Əməliyyat</th>
        </tr>
    </thead>
    <tbody>
         @foreach($announces as $announce)
        <tr>
            <td style="font-weight: bold">{{$announce->id}}</td>
            <td>{{$announce->created_at}}</td>
            <td>{{$announce->email}}</td>
            <td>
                {{$announce->name.' ('}}
                {{$announce->announcer_type=='mediator'?'V )':'M )'}}
            </td>
            <td>
                {{phoneExplode(',',$announce->phone)}}
            </td>
            <td>
                    @if($announce->status==0)
                    <span class="badge badge-warning" style="border-radius: 0px;color: white;font-weight: 500">
                        Gözləmədə
                    </span>
                    @elseif($announce->status==1)
                    <span class="badge badge-success" style="border-radius: 0px;color: white;font-weight: 500">
                         Aktiv
                    </span>
                    @elseif($announce->status==2)
                    <span class="badge badge-danger" style="border-radius: 0px;color: white;font-weight: 500">
                         Dərc olunmamış
                    </span>
                    @endif
            </td>
            <td>

                {{--                                                @if(in_array($user->role()->first()->id,$permittedRoleIds))--}}
                <a class="btn btn-info btn-sm admin-btn" href="{{route('admin.announces.edit',$announce->id)}}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                {{--                                                @endif--}}

                {{--                                                @can('delete-announce')--}}
                <form action="{{route('admin.announces.destroy',$announce->id)}}" method="POST" class="float-left">
                    @csrf

                    <button type="submit" onclick="return confirm('Silmək istədiyinizdən əminsiniz ?');" value="Delete"
                            class="admin-btn btn btn-danger btn-sm">
                        <i class="fas fa-trash">
                        </i>
                    </button>
                </form>
                {{--                                                @endcan--}}


            </td>
        </tr>

    @endforeach

    </tbody>

</table>


<div class="" style="">
    @if($announces->count()>0)
        <div  style="width:15%;margin:0px auto;margin-top: 30px">
            {{$announces->links()}}
        </div>
    @endif
</div>


