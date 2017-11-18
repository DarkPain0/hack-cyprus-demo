@component('components.panels.withAddButton',['title'=>'Electronic Addresses','class'=>'primary'])
    @slot('action')
        {!! route('electronic-addresses.create',['contact_id'=>$contact->id])  !!}
    @endslot
    <ol class="text-left">
        @forelse($contact->electronicAddresses as $eaddress)
            <li>
                <a style="text-decoration: none;" href="{!! route('electronic-addresses.edit',['id'=>$eaddress->id,'contact_id'=>$contact->id]) !!}">
                    {!! $eaddress->info ?? 'E-Address #'.$eaddress->id !!}
                </a>
            </li>
        @empty
            No Electronic Address found!
    </ol>
    @endforelse
@endcomponent