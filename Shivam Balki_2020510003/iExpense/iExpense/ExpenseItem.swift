//
//  ExpenseItem.swift
//  iExpense
//
//  Created by SHivam Balki.
//

import Foundation

struct ExpenseItem: Identifiable, Codable {
    var id = UUID()
    let name: String
    let type: String
    let amount: Double
}
