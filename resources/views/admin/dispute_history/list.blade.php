<x-wire-table>
    {{-- 테이블 제목 --}}
    {{-- 추가 눌러서 정보 입력하고, 저장됨을 확인할 때 화면에. --}}
    <x-wire-thead>
        <th >분쟁분류번호</th>
        <th width='400'>분쟁내용</th>
        <th width='300'>사진</th>
        <th width='200'>이메일</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='200'>
                    <div>{{$item->dispute_id}}</div>
                </td>

                <td width='200'>
                    <div>{{$item->content}}</div>
                </td>

                <td width='200'>{{$item->image}}</td>

                <td width='200'>{{$item->email}}</td>


            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

