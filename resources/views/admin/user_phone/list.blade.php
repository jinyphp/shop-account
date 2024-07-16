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
                <th width='200'>이메일</th>
                <th width='100'>국가</th>
                <th width='100'>code</th>
                <th width='100'>local</th>
                <th >phone</th>

                <th width='200'>수정일</th>

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
                <td width='200'>{{$item->email}}</td>
                <td width='100'>{{$item->country}}</td>
                <td width='100'>{{$item->code}}</td>
                <td width='100'>{{$item->local}}</td>
                <td >
                    {!! $popupEdit($item, $item->phone) !!}
                </td>


                <td width='100'>{{$item->updated_at}}</td>
            </tr>
            @endforeach
        @else
            목록이 없습니다.
        @endif
        </tbody>
    </x-datatable>
</div>
