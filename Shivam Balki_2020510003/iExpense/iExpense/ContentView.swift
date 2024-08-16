//
//  ContentView.swift
//  iExpense
//
//  Created by SHivam Balki.
//

import SwiftUI








struct ContentView: View {
    
    @StateObject var expenses = Expenses()
    @State private var showingAddExpense = false
    
    var body: some View {
        NavigationView {
            List {
                Section(header: Text("Personal")) {
                    ForEach(expenses.items) { item in
                        Group {
                            if item.type == "Personal" {
                                itemView(item: item)
                            }
                        }
                        
                    }
                    .onDelete(perform: removeItems)
                }
                Section(header: Text("Business")) {
                    ForEach(expenses.items) { item in
                        Group {
                            if item.type == "Business" {
                                itemView(item: item)
                            }
                        }
                        
                    }
                    .onDelete(perform: removeItems)
                }
            }
            .navigationTitle("iExpense")
            .toolbar{
                Button {
                    showingAddExpense = true
                } label: {
                    Image(systemName: "plus")
                }
            }
        }
        .sheet(isPresented: $showingAddExpense) {
            AddView(expenses: expenses)
        }
    }
    
    
    fileprivate func itemView(item: ExpenseItem) -> some View {
        HStack {
            VStack(alignment: .leading) {
                Text(item.name)
                    .font(.headline)
                Text(item.type)
            }

            Spacer()
            Text(item.amount, format: .currency(code: Locale.current.currency?.identifier ?? "INR"))
        }.foregroundColor((item.amount < 10) ? .purple : (item.amount < 100) ? .green : .blue)
    }
    
    
    func removeItems(at offsets: IndexSet) {
        expenses.items.remove(atOffsets: offsets)
    }
    
}




struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
