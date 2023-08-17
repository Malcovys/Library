<script setup>
import ButtonItem from "../components/items/ButtonItem.vue";
</script>

<template>
	<div class="relative sm:max-w-xl sm:mx-auto sm:w-[40rem]">

		<div
			class="absolute inset-0 bg-gradient-to-r 
				from-stone-100 to-stone-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<form class="divide-y divide-gray-200">
					<div class="py-8 space-y-4 text-gray-700 sm:text-lg font-bold">

						<div class="relative">
							<input 
								autocomplete="off" 
								type="password" 
								class="peer placeholder-transparent h-10 w-full border-b-2 
									border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" 
								placeholder="Your Old Password"
							/>

							<label class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base
								peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all 
								peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Your Old Password</label>
						</div>

						<div class="relative">
							<input 
								autocomplete="off" 
								type="password" 
								class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300
								text-gray-900 focus:outline-none focus:borer-rose-600" 
								placeholder="Your New Password"
							/>

							<label class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base 
								peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5
								peer-focus:text-gray-600 peer-focus:text-sm">Your New Password</label>
						</div>

                        <div class="relative">
							<input autocomplete="off" type="password" 
								class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 
								text-gray-900 focus:outline-none focus:borer-rose-600" 
								placeholder="Confirm Your Password"
							/>

							<label class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base 
								peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5
								peer-focus:text-gray-600 peer-focus:text-sm">Confirm your Password</label>
						</div>

						<div class="relative">
							<ButtonItem>
								<template #text>Validate</template>
							</ButtonItem>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>