
<!-- Text input -->
<div class="mb-3">
    <label for="text-input" class="form-label">사용자명</label>
    <input type="text" class="form-control" wire:model.defer="forms.user">
</div>

<div class="mb-3">
    <label for="text-input" class="form-label">이름</label>
    <input type="text" class="form-control" wire:model.defer="forms.name">
</div>


<!-- Text input -->
<div class="mb-3">
    <label for="text-input" class="form-label">정책설명</label>
    <input type="text" class="form-control" wire:model.defer="forms.description">
</div>

<div class="mb-3">
    <label for="text-input" class="form-label">결제허용</label>
    <input type="text" class="form-control" wire:model.defer="forms.pay_condition">
</div>

<div class="mb-3">
    <label for="text-input" class="form-label">회원등급</label>
    <input type="text" class="form-control" wire:model.defer="forms.grade">
</div>

<div class="mb-3">
    <label for="text-input" class="form-label">혜택</label>
    <input type="text" class="form-control" wire:model.defer="forms.benefits">
</div>
