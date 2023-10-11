export default function currencyKSH(value) {
  return new Intl.NumberFormat('en-US', {style: 'currency', currency: 'KSH'})
    .format(value);
}
