<tr id="row{!! $user->id !!}">
    <td class="col-sm-2">{!! $user->id !!}</td>
    <td class="col-sm-4">{!! $user->contact->info !!}</td>
    <td class="col-sm-4">{!! $user->email !!}</td>
    <td class="col-sm-2">{!! $user->is_admin == 0 ? 'No' : 'Yes' !!}</td>

    <td class="functions-row">
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <a href="{!! route('users.edit',['id'=>$user->id]) !!}" class="btn btn-sm btn-warning">
                <i class="glyphicon glyphicon-pencil"></i> </a>
        </div>
    </td>
</tr>