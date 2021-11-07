@foreach ($notifications as $item)
<a class="dropdown-item view-notification {{ $item->userPush[0]->read == 0 ? 'unread-noti' : '' }}"
    data-screen="{{ $item->screen }}"
    data-exid="{{ $item->reference_id }}"
    data-pushid="{{ $item->userPush[0]->id }}"
    data-url="{{ route('test.online', $item->reference_id) }}">
    <p class="" style="margin-bottom:0px;">{{ (!empty($item->senderAdmin) ? $item->senderAdmin->name : '') . ' ' . $item->title }}</p>
    <div class="d-flex">
        <div class="ml-auto text-muted" style="font-size: 12px;">
           {{ date('d-m-y H:i:s', strtotime($item->created_at)) }}
        </div>
   </div>
</a>
@endforeach
