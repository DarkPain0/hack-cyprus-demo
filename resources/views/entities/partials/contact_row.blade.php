<tr id="row{!! $contact->id !!}">
    <td>{!! $contact->id !!}</td>
    <td>{!! $contact->name !!}</td>
    <td>{!! $contact->surname ?? 'Not Set'!!}</td>
    <td>{!!$contact->is_company ? $contact->company_name : ''!!}</td>
    <td>{!!$contact->gender ?? 'Not Set' !!}</td>
    <td> {!! $contact->birth->format('d.m.Y') ?? 'Not Set' !!}</td>
    <td>{!! $contact->occupation ?? 'Not Set'!!}</td>
    <td>{!! $contact->addresses_count ? $contact->addresses->first()->info : 'No Addresses'!!}</td>
    <td>{!! $contact->electronic_addresses_count ? $contact->electronicAddresses->first()->info : 'No E-Addresses'!!}</td>
    <td>{!! $contact->phones_count ? $contact->phones->first()->info : 'No Phones'!!}</td>

    <td class="functions-row">
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <a href="{!! route('contacts.show',['id'=>$contact->id]) !!}" class="btn btn-sm btn-info" title="Show" data-toggle="tooltip" data-placement="top" data-container="body">
                <i class="glyphicon glyphicon-eye-open"></i> </a>
            <a href="{!! route('contacts.edit',['id'=>$contact->id]) !!}" class="btn btn-sm btn-warning" title="Edit" data-toggle="tooltip"
               data-placement="top" data-container="body">
                <i class="glyphicon glyphicon-pencil"></i> </a>
        </div>

    </td>
</tr>