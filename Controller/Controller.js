function openChargeRateForm()
{
    document.getElementById("PeriodForm").style.display="none";
    document.getElementById("BandWidthForm").style.display="none";
    document.getElementById("DiscountForm").style.display="none";
    document.getElementById("StorageForm").style.display="none";
    document.getElementById("ChargeRateForm").style.display="block";
}
function openBandWidthForm()
{
    document.getElementById("PeriodForm").style.display="none";
    document.getElementById("ChargeRateForm").style.display="none";
    document.getElementById("DiscountForm").style.display="none";
    document.getElementById("StorageForm").style.display="none";
    document.getElementById("BandWidthForm").style.display="block";
}
function openDiscountForm()
{
    document.getElementById("PeriodForm").style.display="none";
    document.getElementById("ChargeRateForm").style.display="none";
    document.getElementById("BandWidthForm").style.display="none";
    document.getElementById("StorageForm").style.display="none";
    document.getElementById("DiscountForm").style.display="block";
}
function openStorageForm()
{
    document.getElementById("PeriodForm").style.display="none";
    document.getElementById("ChargeRateForm").style.display="none";
    document.getElementById("BandWidthForm").style.display="none";
    document.getElementById("DiscountForm").style.display="none";
    document.getElementById("StorageForm").style.display="block";
}
function openPeriodForm()
{
    document.getElementById("ChargeRateForm").style.display="none";
    document.getElementById("BandWidthForm").style.display="none";
    document.getElementById("DiscountForm").style.display="none";
    document.getElementById("StorageForm").style.display="none";
    document.getElementById("PeriodForm").style.display="block";
}
function closeChargeRateForm()
{
    document.getElementById("ChargeRateForm").style.display="none";
}
function closeBandWidthForm()
{
    document.getElementById("BandWidthForm").style.display="none";
}
function closeDiscountForm()
{
    document.getElementById("DiscountForm").style.display="none";
}
function closeStorageForm()
{
    document.getElementById("StorageForm").style.display="none";
}
function closePeriodForm()
{
    document.getElementById("PeriodForm").style.display="none";
}