<div class=<!-- Text input -->
    <div class="mb-3">
        <label for="text-input" class="form-label">이름</label>
        <input type="text" class="form-control" wire:model.defer="forms.name">
    </div>

<!-- Text input -->
<div class="mb-3">
    <label for="text-input" class="form-label">내용</label>
    <input type="text" class="form-control" wire:model.defer="forms.description">
</div>

<div class="mb-3">
    <label for="text-input" class="form-label">결제허용</label>
    <input type="text" class="form-control" wire:model.defer="forms.pay_condition">
</div>
