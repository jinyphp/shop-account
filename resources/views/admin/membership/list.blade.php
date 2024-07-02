<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>Id</th>
        <th>사용자명</th>
        <th>이름</th>
        <th width='300'>정책설명</th>
        <th>결제허용</th>
        <th>회원등급</th>
        <th>혜택</th>
        <th>등록일자</th>

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
                        {{$item->user}}
                    </x-click>
                </td>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->description}}
                </td>
                <td>
                    {{$item->pay_condition}}
                </td>
                <td>{{$item->grade}}</td>

                <td>{{$item->benefits}}</td>

                <td>{{$item->created_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
