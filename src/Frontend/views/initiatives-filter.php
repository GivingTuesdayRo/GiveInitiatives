<form class="mb-4">
    <div class="initiatives-filters">
        <div class="form-row">
            <div class="initiative-filter col-auto pr-3">
				<?php require 'filters/campaign-year.php'; ?>
            </div>
            <div class="initiative-filter col-auto pl-3 pr-3">
				<?php require 'filters/initiative-type.php'; ?>
            </div>

            <div class="col-auto pl-3">
                <button type="submit" class="btn btn-primary">
                    Filtreaza
                </button>
            </div>
        </div>
    </div>
</form>