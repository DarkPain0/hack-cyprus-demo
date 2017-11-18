@component('components.panels.withAddButton',['title'=>'Addresses','class'=>'warning'])
    @slot('action')
        {!! route('addresses.create',['contact_id'=>$contact->id])  !!}
    @endslot
    <ol class="text-left">
        @forelse($contact->addresses as $address)
            <li>
                <a style="text-decoration: none;" href="{!! route('addresses.edit',['id'=>$address->id,'contact_id'=>$contact->id]) !!}">
                    {!! $address->info ?? 'Address #'.$address->id!!}
                </a>
            </li>
        @empty
            No Addresses found!
    </ol>
    @endforelse
@endcomponent