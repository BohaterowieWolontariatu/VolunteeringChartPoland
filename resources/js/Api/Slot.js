export function storeSlot({
                        schedule_at,
                        pointShift,
                        is_reserve_list = false,
                      }) {
  this.$inertia.post(route("slot.store"), params)
}