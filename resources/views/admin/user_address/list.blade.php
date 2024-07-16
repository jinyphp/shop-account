<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='100'>Id</th>
        <th width='200'>이메일</th>
        <th width='100'>국가</th>
        <th width='100'>도시</th>
        <th >Addr1</th>
        <th width='200'>Addr2</th>
        <th width='200'>zipcode</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='100'>{{$item->id}}</td>
                <td width='200'>{{$item->email}}</td>
                <td width='100'>{{$item->country}}</td>
                <td width='100'>{{$item->city}}</td>
                <td >
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->addr1}}
                    </x-click>
                </td>

                <td width='200'>{{$item->addr2}}</td>
                <td width='100'>{{$item->zipcode}}</td>


                <td width='200'>
                    <div>{{$item->order_id}}</div>
                    <div>{{$item->product}}</div>
                </td>

                <td width='100'>{{$item->title}}</td>
                <td >

                </td>
                <td width='300'>{{$item->start_date}}</td>
                <td width='200'>{{$item->end_date}}</td>

            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
