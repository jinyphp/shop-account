<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='200'>주문번호/상품</th>
        <th >분쟁제목</th>
        <th width='300'>진행상태</th>
        <th width='200'>분쟁시작일</th>
        <th >분쟁종료일</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='200'>
                    <div>{{$item->order_id}}</div>
                    <div>{{$item->product}}</div>
                </td>

                <td width='100'>{{$item->title}}</td>
                <td >
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->status}}
                    </x-click>
                </td>
                <td width='300'>{{$item->start_date}}</td>
                <td width='200'>{{$item->end_date}}</td>


            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

