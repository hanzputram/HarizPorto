# Capabilities Management System - Setup Complete

## ✅ What Has Been Created

### 1. Database & Model

- **Migration**: `2026_02_16_093103_create_capabilities_table.php` ✅ MIGRATED
- **Model**: `App\Models\Capability.php` ✅ CREATED
- **Fields**:
    - `title` - Capability name
    - `description` - Detailed description
    - `icon` - Emoji icon
    - `module_number` - Module identifier (e.g., "01", "02")
    - `order` - Display order

### 2. Controller Methods

- **AdminController** updated with:
    - `storeCapability()` - Add new capability
    - `updateCapability()` - Edit existing capability
    - `deleteCapability()` - Remove capability
    - Capabilities included in dashboard data

### 3. Routes

- **web.php** updated with:
    - `POST /admin/capability` - Create
    - `PUT /admin/capability/{id}` - Update
    - `DELETE /admin/capability/{id}` - Delete
    - Capabilities data passed to welcome view

## 📝 Manual Steps Required

### Step 1: Add Admin Interface Section

Add this section to `resources/views/admin/dashboard.blade.php` **AFTER** the Workflow section (around line 236):

```html
<!-- CAPABILITIES MANAGEMENT -->
<section id="capabilities" class="mb-16">
    <div
        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6"
    >
        <h3 class="text-2xl font-bold">Service Capabilities</h3>
        <button
            onclick="document.getElementById('add-capability-form').classList.toggle('hidden')"
            class="text-xs font-bold text-lavender-dark"
        >
            + Add Capability
        </button>
    </div>

    <div
        id="add-capability-form"
        class="hidden neo-card p-8 bg-white mb-8 shadow-lg"
    >
        <form action="/admin/capability" method="POST" class="space-y-4">
            @csrf
            <div class="grid sm:grid-cols-2 gap-4">
                <input
                    type="text"
                    name="title"
                    placeholder="Capability Title"
                    class="neo-input text-sm"
                    required
                />
                <div class="flex gap-2">
                    <input
                        type="text"
                        name="icon"
                        placeholder="Icon (emoji)"
                        class="neo-input text-sm w-20"
                        value="📐"
                    />
                    <input
                        type="text"
                        name="module_number"
                        placeholder="Module #"
                        class="neo-input text-sm w-24"
                        value="01"
                    />
                    <input
                        type="number"
                        name="order"
                        value="{{ count($capabilities) + 1 }}"
                        class="neo-input text-sm w-20"
                        required
                    />
                </div>
            </div>
            <textarea
                name="description"
                placeholder="Detailed description of this capability"
                class="neo-input text-sm h-24"
                required
            ></textarea>
            <button type="submit" class="neo-btn text-white! py-3 px-8">
                Add Capability
            </button>
        </form>
    </div>

    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($capabilities as $capability)
        <div
            class="p-6 bg-white border border-black/5 rounded-2xl relative group shadow-sm hover:shadow-md transition-all duration-300"
        >
            <div class="flex items-start gap-4 mb-4">
                <div
                    class="w-12 h-12 rounded-xl bg-lavender-light/30 flex items-center justify-center text-2xl flex-shrink-0"
                >
                    {{ $capability->icon }}
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <span
                            class="text-[8px] font-black uppercase tracking-[0.3em] text-lavender-dark"
                            >Module {{ $capability->module_number }}</span
                        >
                        <span class="w-1 h-1 rounded-full bg-black/10"></span>
                        <span
                            class="text-[8px] font-black uppercase tracking-[0.3em] text-black/20"
                            >Order: {{ $capability->order }}</span
                        >
                    </div>
                    <h5 class="font-bold text-lg mb-2">
                        {{ $capability->title }}
                    </h5>
                    <p class="text-xs text-black/40 leading-relaxed">
                        {{ $capability->description }}
                    </p>
                </div>
            </div>
            <div class="absolute top-6 right-6 flex gap-2">
                <button
                    onclick="document.getElementById('edit-capability-{{ $capability->id }}').classList.toggle('hidden')"
                    class="w-6 h-6 flex items-center justify-center rounded-lg bg-skyblue/10 text-skyblue opacity-0 group-hover:opacity-100 transition-opacity text-[10px]"
                >
                    ✎
                </button>
                <form
                    action="/admin/capability/{{ $capability->id }}"
                    method="POST"
                    onsubmit="return confirm('Delete this capability?')"
                >
                    @csrf @method('DELETE')
                    <button
                        class="w-6 h-6 flex items-center justify-center rounded-lg bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-opacity"
                    >
                        ×
                    </button>
                </form>
            </div>

            <div
                id="edit-capability-{{ $capability->id }}"
                class="hidden mt-4 pt-4 border-t border-black/5"
            >
                <form
                    action="/admin/capability/{{ $capability->id }}"
                    method="POST"
                    class="space-y-3"
                >
                    @csrf @method('PUT')
                    <input
                        type="text"
                        name="title"
                        value="{{ $capability->title }}"
                        class="neo-input text-[10px] py-1"
                        required
                    />
                    <div class="grid grid-cols-3 gap-2">
                        <input
                            type="text"
                            name="icon"
                            value="{{ $capability->icon }}"
                            class="neo-input text-[10px] py-1"
                            placeholder="Icon"
                        />
                        <input
                            type="text"
                            name="module_number"
                            value="{{ $capability->module_number }}"
                            class="neo-input text-[10px] py-1"
                            placeholder="Module"
                        />
                        <input
                            type="number"
                            name="order"
                            value="{{ $capability->order }}"
                            class="neo-input text-[10px] py-1"
                            required
                        />
                    </div>
                    <textarea
                        name="description"
                        class="neo-input text-[10px] py-1 h-16"
                    >
{{ $capability->description }}</textarea
                    >
                    <button
                        type="submit"
                        class="bg-black text-white w-full py-2 rounded-lg text-[8px] font-black uppercase tracking-widest"
                    >
                        Update Capability
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div
            class="col-span-full py-10 bg-white rounded-2xl border border-dashed border-black/10 text-center opacity-40 italic text-xs"
        >
            No capabilities defined yet.
        </div>
        @endforelse
    </div>
</section>
```

### Step 2: Add Sidebar Link

In `resources/views/admin/dashboard.blade.php`, add this link in the sidebar navigation (around line 28):

```html
<a href="#capabilities" class="sidebar-link">
    <span class="text-lg">🎯</span> Capabilities
</a>
```

### Step 3: Update Welcome Page (Optional)

To make the capabilities section on the homepage dynamic, replace the hardcoded capability cards in `resources/views/welcome.blade.php` (lines 104-134) with:

```html
<div class="lg:w-1/2 grid grid-cols-1 gap-6 w-full">
    @forelse($capabilities->take(1) as $capability)
    <div
        class="neo-card p-12 bg-[#FBFBFF] group/card hover:bg-lavender-light/10 transition-colors duration-500 border-black/5"
        data-aos="fade-up"
    >
        <div class="flex justify-between items-start mb-8">
            <div
                class="w-12 h-12 rounded-2xl bg-white border border-black/5 flex items-center justify-center shadow-sm"
            >
                {{ $capability->icon }}
            </div>
            <span
                class="text-[10px] font-black text-black/20 uppercase tracking-widest group-hover/card:text-lavender-dark transition-colors"
                >Module {{ $capability->module_number }}</span
            >
        </div>
        <h3 class="text-3xl font-extrabold mb-4 tracking-tighter uppercase">
            {{ $capability->title }}
        </h3>
        <p
            class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest max-w-sm"
        >
            {{ $capability->description }}
        </p>
    </div>
    @empty
    <!-- Fallback content if no capabilities exist -->
    <div
        class="neo-card p-12 bg-[#FBFBFF] group/card hover:bg-lavender-light/10 transition-colors duration-500 border-black/5"
        data-aos="fade-up"
    >
        <div class="flex justify-between items-start mb-8">
            <div
                class="w-12 h-12 rounded-2xl bg-white border border-black/5 flex items-center justify-center shadow-sm"
            >
                📐
            </div>
            <span
                class="text-[10px] font-black text-black/20 uppercase tracking-widest group-hover/card:text-lavender-dark transition-colors"
                >Module 01</span
            >
        </div>
        <h3 class="text-3xl font-extrabold mb-4 tracking-tighter uppercase">
            Hard Surface
        </h3>
        <p
            class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest max-w-sm"
        >
            Industrial assets with clean topology and soft-edge aesthetics
            optimized for cinematic high-poly rendering.
        </p>
    </div>
    @endforelse
</div>
```

## 🚀 How to Use

1. **Access Admin Panel**: Navigate to `/admin`
2. **Scroll to Capabilities Section**: Click "Capabilities" in the sidebar
3. **Add New Capability**: Click "+ Add Capability"
4. **Fill in Details**:
    - Title: e.g., "Hard Surface Modeling"
    - Icon: Any emoji (📐, 🌍, ✨, etc.)
    - Module Number: e.g., "01", "02", "03"
    - Order: Display order (1, 2, 3...)
    - Description: Detailed description
5. **Save**: Click "Add Capability"
6. **Edit/Delete**: Hover over any capability card to see edit/delete buttons

## 📊 Database Structure

```sql
CREATE TABLE capabilities (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(255) DEFAULT '📐',
    module_number VARCHAR(255) DEFAULT '01',
    order INT DEFAULT 1,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

## ✨ Features

- ✅ Full CRUD operations
- ✅ Custom icons (emoji support)
- ✅ Module numbering
- ✅ Order management
- ✅ Inline editing
- ✅ Confirmation on delete
- ✅ Fallback content if no capabilities exist
- ✅ Responsive design
- ✅ Smooth animations

Your capabilities system is now ready to use! 🎉
