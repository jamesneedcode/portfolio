<div class="form-grid">
    <div class="form-group">
        <label for="title">Project Title <span class="required">*</span></label>
        <input type="text" id="title" name="title" value="{{ old('title', $project?->title) }}" placeholder="My Awesome Project" required>
        @error('title')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="category">Category <span class="required">*</span></label>
        <select id="category" name="category" required>
            @foreach(['Web', 'Mobile', 'API', 'Desktop', 'Other'] as $cat)
            <option value="{{ $cat }}" {{ old('category', $project?->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        @error('category')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group form-full">
        <label for="description">Short Description <span class="required">*</span></label>
        <textarea id="description" name="description" rows="2" placeholder="A brief summary of the project..." required>{{ old('description', $project?->description) }}</textarea>
        @error('description')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group form-full">
        <label for="long_description">Full Description</label>
        <textarea id="long_description" name="long_description" rows="5" placeholder="Detailed description with features, tech choices, challenges...">{{ old('long_description', $project?->long_description) }}</textarea>
    </div>

    <div class="form-group form-full">
        <label for="technologies">Technologies <span class="form-hint">(comma separated)</span></label>
        <input type="text" id="technologies" name="technologies"
            value="{{ old('technologies', $project?->technologies ? implode(', ', $project->technologies) : '') }}"
            placeholder="Laravel, Vue.js, MySQL, Tailwind CSS">
        @error('technologies')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="github_url">GitHub URL</label>
        <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $project?->github_url) }}" placeholder="https://github.com/user/repo">
        @error('github_url')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="live_url">Live Demo URL</label>
        <input type="url" id="live_url" name="live_url" value="{{ old('live_url', $project?->live_url) }}" placeholder="https://myproject.com">
        @error('live_url')<span class="field-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="order">Display Order</label>
        <input type="number" id="order" name="order" value="{{ old('order', $project?->order ?? 0) }}" min="0">
    </div>

    <div class="form-group form-check">
        <label class="checkbox-label">
            <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $project?->featured) ? 'checked' : '' }}>
            <span class="checkmark"></span>
            Mark as Featured Project
        </label>
    </div>

    <div class="form-group form-full">
        <label for="image">Project Image</label>
        @if($project?->image)
        <div class="current-image">
            <img src="{{ Storage::url($project->image) }}" alt="Current image">
            <span class="image-label">Current image (upload a new one to replace)</span>
        </div>
        @endif
        <input type="file" id="image" name="image" accept="image/*" class="file-input">
        @error('image')<span class="field-error">{{ $message }}</span>@enderror
    </div>
</div>
