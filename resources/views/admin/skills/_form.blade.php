<div class="form-grid">
    <div class="form-group">
        <label for="name">Skill Name <span class="required">*</span></label>
        <input type="text" id="name" name="name" value="{{ old('name', $skill?->name) }}" placeholder="e.g. Laravel" required>
        @error('name')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="category">Category <span class="required">*</span></label>
        <select id="category" name="category" required>
            @foreach(['Frontend', 'Backend', 'Database', 'Tools', 'Mobile', 'Other'] as $cat)
            <option value="{{ $cat }}" {{ old('category', $skill?->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        @error('category')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="icon">Icon Identifier <span class="form-hint">(e.g. php, laravel, vue)</span></label>
        <input type="text" id="icon" name="icon" value="{{ old('icon', $skill?->icon) }}" placeholder="laravel">
    </div>

    <div class="form-group">
        <label for="order">Display Order</label>
        <input type="number" id="order" name="order" value="{{ old('order', $skill?->order ?? 0) }}" min="0">
    </div>

    <div class="form-group form-full">
        <label for="proficiency">Proficiency: <strong id="proficiencyDisplay">{{ old('proficiency', $skill?->proficiency ?? 80) }}%</strong></label>
        <input type="range" id="proficiency" name="proficiency"
            value="{{ old('proficiency', $skill?->proficiency ?? 80) }}"
            min="0" max="100" step="5"
            oninput="document.getElementById('proficiencyDisplay').textContent = this.value + '%'"
            class="range-slider">
    </div>
</div>
