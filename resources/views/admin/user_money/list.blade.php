<div>
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    <x-datatable>
        <thead>
            <tr>
                <th width='20'>
                    <input type='checkbox' class="form-check-input" wire:model="selectedall">
                </th>
                <th width='100'>Id</th>
                <th >이메일</th>
                <th width='100'>통화</th>
                <th width='100'>Balance</th>
                <th width='100'>은행명</th>
                <th width='300'>계좌번호</th>
                <th width='200'>수정일자</th>

            </tr>
        </thead>
        <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)

            {{-- row-selected --}}
            @if(in_array($item->id, $selected))
            <tr class="row-selected">
            @else
            <tr>
            @endif

                <td width='20'>
                    <input type='checkbox' name='ids' value="{{$item->id}}"
                    class="form-check-input"
                    wire:model="selected">
                </td>
                <td width='100'>{{$item->id}}</td>
                <td >
                    {!! $popupEdit($item, $item->email) !!}
                </td>
                <td width='100'>{{$item->currency}}</td>
                <td width='100'>
                    <a href="/shop/admin/user/money/{{$item->id}}">
                    {{$item->balance}}
                    </a>
                </td>
                <td width='100'>{{$item->bank_name}}</td>
                <td width='300'>{{$item->bank_account}}</td>
                <td width='200'>{{$item->updated_at}}</td>
            </tr>
            @endforeach
        @else
            목록이 없습니다.
        @endif
        </tbody>
    </x-datatable>
</div>
