@component('components.panels.withAddButton',['title'=>'Phones','class'=>'danger'])
    @slot('action')
        {!! route('phones.create',['contact_id'=>$contact->id])  !!}
    @endslot
    <ol class="text-left">
        @forelse($contact->phones as $phone)
            <li>
                <a style="text-decoration: none;" href="{!! route('phones.edit',['id'=>$phone->id,'contact_id'=>$contact->id]) !!}">
                    {!! $phone->info ?? 'Phone #'.$phone->id!!}
                </a>
            </li>
        @empty
            No Phones found!
        @endforelse
    </ol>
@endcomponent