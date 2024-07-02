<div>
    <x-navtab class="mb-3 nav-bordered">

        <!-- formTab - forms라는 이름의 배열로 묶여서 넘어온다. -> forms.~ -->
        {{-- column 이름, 어떤 정보가 어떤 column에 들어가는지 명시. 추가 눌렀을 때 그 팝업창(input) --}}
        <x-navtab-item class="show active" >

            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">기본정보</span>
            </x-navtab-link>

            <x-form-hor>
                <x-form-label>활성화</x-form-label>
                <x-form-item>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.enable")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>분쟁분류번호</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.dispute_id")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>


            <x-form-hor>
                <x-form-label>분쟁내용</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.content")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>



            <x-form-hor>
                <x-form-label>사진</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.image")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>이메일</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.email")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

        </x-navtab-item>


        <!-- formTab -->
        <x-navtab-item >
            <x-navtab-link class="rounded-0">
                <span class="d-none d-md-block">메모</span>
            </x-navtab-link>

            <x-form-hor>
                <x-form-label>메모</x-form-label>
                <x-form-item>
                    {!! xTextarea()
                        ->setWire('model.defer',"forms.description")
                    !!}
                </x-form-item>
            </x-form-hor>

        </x-navtab-item>

    </x-navtab>
</div>
