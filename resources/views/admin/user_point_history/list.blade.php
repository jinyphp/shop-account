<div>
    회원: {{$user['email']}}

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
                <th width='200'>일자</th>
                <th width='300'>이메일</th>
                <th>내용</th>
                <th width='100'>Balance</th>
                <th width='100'>적립</th>
                <th width='100'>사용</th>

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
                <td width='200'>{{$item->updated_at}}</td>
                <td width='300'>
                    {!! $popupEdit($item, $item->email) !!}
                </td>
                <td>{{$item->description}}</td>
                <td width='100'>{{$item->balance}}</td>
                <td width='100'>{{$item->input}}</td>
                <td width='100'>{{$item->output}}</td>
            </tr>
            @endforeach
        @else
            목록이 없습니다.
        @endif
        </tbody>
    </x-datatable>
</div>
