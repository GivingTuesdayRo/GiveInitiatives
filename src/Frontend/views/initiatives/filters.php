<form class="mb-4">
    <div class="initiatives-filters">
        <div class="form-row mb-3">
            <div class="initiative-filter col pr-3">
				<?php require 'filters/campaign-year.php'; ?>
            </div>

            <div class="initiative-filter col pl-3 pr-3">
				<?php require 'filters/initiative-type.php'; ?>
            </div>

            <div class="initiative-filter col pl-3 pr-3">
				<?php require 'filters/initiator-type.php'; ?>
            </div>
        </div>

        <div class="form-row">
            <div class="initiative-filter col pr-3">
			    <?php require 'filters/beneficiary-type.php'; ?>
            </div>

            <div class="initiative-filter col pl-3 pr-3">
			    <?php require 'filters/location.php'; ?>
            </div>

            <div class="col pl-3 pt-3">
                <button type="submit" class="btn btn-primary align-bottom">
                    Filtreaza
                </button>
            </div>
        </div>
    </div>
</form>