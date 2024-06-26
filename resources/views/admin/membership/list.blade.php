<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>Id</th>
        <th>이름</th>
        <th>내용</th>
        <th>결제허용</th>
        <th width='200'>등록일자</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='50'>
                    {{$item->id}}
                </td>
                <td>
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->name}}
                    </x-click>
                </td>
                <td>
                    {{$item->description}}
                </td>
                <td>
                    {{$item->pay_condition}}
                </td>
                <td width='200'>{{$item->created_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
<<<<<<< HEAD
=======

>>>>>>> bb5093d018f1bc06e697dc80f82abb89470d827a
