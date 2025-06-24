{{-- resources/views/user/services/_form.blade.php --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <p><strong>Please fix the following errors:</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label class="form-label">Service Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Service Name" value="{{ old('name', $service->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Short Description (Max 500 chars)</label>
    <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" rows="3" placeholder="A brief summary of the service">{{ old('short_description', $service->short_description ?? '') }}</textarea>
    @error('short_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Full Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Detailed description of the service">{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Icon (Recommended: SVG, PNG)</label>
            <input type="file" name="icon" class="dropify @error('icon') is-invalid @enderror" data-height="120"
                   data-default-file="{{ isset($service) && $service->icon ? asset('storage/' . $service->icon) : '' }}" />
        </div>
        @error('icon')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Main Image (Recommended: JPG, PNG)</label>
            <input type="file" name="image" class="dropify @error('image') is-invalid @enderror" data-height="120"
                   data-default-file="{{ isset($service) && $service->image ? asset('storage/' . $service->image) : '' }}" />
        </div>
        @error('image')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label class="form-label">Status</label>
    <select class="form-control @error('status') is-invalid @enderror" name="status" required>
        <option value="active" {{ (old('status', $service->status ?? 'active') == 'active') ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ (old('status', $service->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>