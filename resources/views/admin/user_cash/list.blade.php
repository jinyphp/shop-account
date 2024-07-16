<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='100'>Id</th>
        <th >이메일</th>
        <th width='100'>통화</th>
        <th width='100'>Balance</th>
        <th width='100'>은행명</th>
        <th width='300'>계좌번호</th>
        <th width='200'>수정일자</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='100'>{{$item->id}}</td>
                <td >
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->email}}
                    </x-click>
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
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
