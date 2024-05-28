<style>
    header {
        border-bottom: 0.8px solid #FF9E0B;
        box-shadow: 0 4px 8px rgb(227 124 31 / 10%);
    }
    .header {
        background-color: #FBF7ED;
        color: #fff;
        display: flex;
        padding: 10px;
        justify-content: space-between;
        align-items: center;
    }
    .search-container {
        position: relative;
        display: flex;
        align-items: center;
    }
    .search-input {
        width: 120px;
        padding: 4px;
        border: 1px solid #FF9E0B;
        border-radius: 30px;
        background-color: #FBF7ED;
    }
    .focus\:ring-indigo-500:focus {
    --tw-ring-color: #FF9E0B !important;
}
    .search-icon {
        position: absolute;
        left: 10px;
        font-size: 16px;
        color: #FF9E0B;
    }
</style>
<header class="header">
    <div>
        <img src="{{ asset('menu-open.png') }}" alt="Logo" width="30">
    </div>
    <div>
        <img src="{{ asset('logo-header.png') }}" alt="Logo" width="150">
    </div>
    <div class="search-container">
        <i class="ri-search-line search-icon"></i>
        <input type="text" class="search-input">
    </div>
                 

</header>
