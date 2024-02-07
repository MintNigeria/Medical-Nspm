<!-- Modal -->
<div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">VIEW ITEMS IN STOCK</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control mb-3" id="searchInventory" placeholder="Search Inventory">
                @unless (count($inventories) === 0)
                    <div style="display: grid; grid-template-columns: auto auto auto" id="inventoryList">
                        @foreach ($inventories as $inventory)
                            <p>
                                {{ $inventory->name }} ({{ $inventory->no_of_units }})
                            </p>
                        @endforeach
                    </div>
                @else
                    <p>No inventories available.</p>
                @endunless

                {{ $inventories->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInventory');
            const inventoryList = document.getElementById('inventoryList');

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();

                // Filter the inventory items based on the search term
                const filteredInventories = Array.from(inventoryList.children).filter(item => {
                    const inventoryName = item.textContent.toLowerCase();
                    return inventoryName.includes(searchTerm);
                });

                // Show/hide inventory items based on the filter
                Array.from(inventoryList.children).forEach(item => {
                    if (filteredInventories.includes(item)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</div>
